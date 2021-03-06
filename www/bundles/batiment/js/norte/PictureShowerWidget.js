define(["dojo/_base/declare","dijit/_WidgetBase", "dijit/_TemplatedMixin","dojo/text!./pictureShowerWidget/templates/pictureShower.html",
	"dojo/dom-style","dojo/dom-geometry", "dojo/_base/fx","dojo/fx", "dojo/_base/lang","dojo/dom-construct","dojo/dom","dojo/on",
	"dojo/_base/xhr","dojo/_base/connect","dojo/html","dojo/mouse","dojo/dom-attr","dojo/query"],
	function(declare, WidgetBase, TemplatedMixin,template,domStyle,domGeometry, baseFx, fx, lang,domConstruct,dom,on,xhr,connect,html,mouse,domattr,query){
		return declare([WidgetBase, TemplatedMixin], {
            
			listImage: "",
			
			listCommentaire: "",
	
			listRubrique:"",

            listRubriqueLink:[],
			
			currentIdRubrique:0,
	    
			url: "default",
			
			currentPos : 0,
			
			isSliderMove : false,
			
			// True si la sourie survol les bouton de pagination.
			isOverPagineButton : false,
			
			widthSlider: 650,
			
			maxheight: 380,
			
			maxwidth: 650,
			
			widthSumLimit: 0,
			
			templateString: template,
            
			baseClass: "PictureShowerWidget",
            
			mouseAnim: null,
            
			baseBackgroundColor: "#fff",
			
			mouseBackgroundColor: "#def",
			
			root: "",

			postCreate: function(){
				// Get a DOM node reference for the root of our widget
				var domNode = this.domNode;
	  
				// Run any parent postCreate processes - can be done at any point
				this.inherited(arguments);
				
				//Iniatlisation de la somme contextuelle maximal pour le slider
				this.widthSumLimit = this.widthSlider;
				
				// Pose les evenements sur les boutons de navigation.
				
				on(this.nextNode,"click",lang.hitch(this, "_getNextCounter"));
				on(this.previousNode,"click", lang.hitch(this, "_getPreviousCounter"));
				
				on(this.rightButtonNode,"click", lang.hitch(this,"_rightSliderClick"));
				on(this.leftButtonNode,"click", lang.hitch(this,"_leftSliderClick"));
				
				on(this.sendCommButton,"click", lang.hitch(this,"_sendCommClick"));
				
				on(this.mainPictureNode,"load", lang.hitch(this,"_resizePicture"));
				
				on(this.mainPictureNode,mouse.enter, lang.hitch(this,"_displayButtonHover"));
				on(this.mainPictureNode,mouse.leave, lang.hitch(this,"_displayButtonLeave"));
				
				// Capte les evenements de survoles des boutons de pagination.
				on(this.previousNode,mouse.enter, lang.hitch(this,"_mouseEnterPagineButton"));
				on(this.previousNode,mouse.leave, lang.hitch(this,"_mouseLeavePagineButton"));
				on(this.nextNode,mouse.enter, lang.hitch(this,"_mouseEnterPagineButton"));
				on(this.nextNode,mouse.leave, lang.hitch(this,"_mouseLeavePagineButton"));

                on(this.textCommentaire,"click", lang.hitch(this,"_activePlaceHolder"));
                this._inactivePlaceHolder();

			},
			startup: function(){
				console.log("startup");
			}
			,_inactivePlaceHolder:function(){
                domattr.set(this.textCommentaire, "value", this.textCommentaire.placeholder);
                domStyle.set(this.textCommentaire,"color","grey");
            },_activePlaceHolder:function(){
                domattr.set(this.textCommentaire, "value", "");
                domStyle.set(this.textCommentaire,"color","black");
            }

            ,
			_resizePicture:function()
			{
				var isHeigher = this.mainPictureNode.naturalHeight >= this.mainPictureNode.naturalWidth;
				var isMaxHeight = this.mainPictureNode.naturalHeight > this.maxheight;
				var isMaxWidth = this.mainPictureNode.naturalWidth > this.maxwidth;
				
				if(!isMaxHeight && !isMaxWidth)
				{
					domStyle.set(this.mainPictureNode, "height",'');
					domStyle.set(this.mainPictureNode, "width",'');
					return;
				}
				
				if(isMaxWidth)
				{
					domStyle.set(this.mainPictureNode, "width",this.maxwidth+"px");
					domStyle.set(this.mainPictureNode, "height",'');
				}
				
				if(isMaxHeight)
				{
					domStyle.set(this.mainPictureNode, "height",this.maxheight+"px");
					domStyle.set(this.mainPictureNode, "width",'');
					
					// Calcul de la hauteur possible manuellement.
					if(domStyle.get(this.mainPictureNode, "width")> this.maxwidth)
					{
						var pixDelta = domStyle.get(this.mainPictureNode, "width") - this.maxwidth;
						var coefReduc = (100 - ((pixDelta * 100) / this.maxwidth)) / 100;
						var calculedHeight = domStyle.get(this.mainPictureNode, "height") * coefReduc;
						
						domStyle.set(this.mainPictureNode, "width",this.maxwidth+"px");
						domStyle.set(this.mainPictureNode, "height",calculedHeight+"px");
					}
				}
				
				
				
			},
			
			_mouseEnterPagineButton:function()
			{
				this.isOverPagineButton = true;
			},
			
			_mouseLeavePagineButton:function()
			{
				this.isOverPagineButton = false;
			},
			
			_displayButtonHover:function()
			{
				
				if(parseInt(domStyle.get(this.previousNode, "opacity")) > 0)
				{
					return;
				}
				
				var effect = {
					node:this.previousNode,
					duration: 500,
					properties: 
					{
						opacity : {start:0, end: 1 }
					}
				};
				
				baseFx.animateProperty(effect).play();
				
				effect.node = this.nextNode;
				
				baseFx.animateProperty(effect).play();
			},
			
			_displayButtonLeave:function()
			{
				// Retarde la prise en charge de l'évenement.
				setTimeout(lang.hitch(this,"_displayButtonLeaveCallBack"), 500);
			},
			
			// Permet de detecter si la sourie est au dessus des boutons de pagination.
			// Sans le timeOut, il est impossible de re-couper les évènements.
			_displayButtonLeaveCallBack:function()
			{
				// Si on est au dessus des boutons de paginations, on les laisses apparents.
				if(this.isOverPagineButton)
				{
					return;
				}
				
				var effect = {
					node:this.previousNode,
					duration: 500,
					properties: 
					{
						opacity : {start:1, end: 0 }
					}
				};
				
				baseFx.animateProperty(effect).play();
				
				effect.node = this.nextNode;
				
				baseFx.animateProperty(effect).play();
			},
			
			_sendCommClick:function()
			{
				// Affecte l'id de la photo dans le formulaire avant de l'envoyer
				this.idphoto.value = this.listImage[this.currentPos].id;
				
				// Gestion de la validation
				if(domattr.get(this.textCommentaire, "value") == "")
				{
					baseFx.animateProperty(
						{
							node:this.textCommentaire,
							duration: 500,
							properties: 
							{
								backgroundColor : { end: "red", start:"white" }
							},
							onEnd: lang.hitch(this,function(){
								html.set(this.sendStatus,"Le commentaire est vide");
							})
						}).play();
						return;
					
				}else
				{
					domStyle.set(this.textCommentaire,"background-color","white");
				}
				
				// Réinitialise les styles modifiés par d'éventuelle modification précédente'
				domStyle.set(this.sendStatus, "opacity", "1");
				
				// Submit du formulaire
				xhr.post(
				{
					url: this.root+"commentaire/create/",
					form : this.commentaireForm,
					handleAs : "json",
					load: lang.hitch(this,function(formStatus){
						if(formStatus.formOk)
						{
							html.set(this.sendStatus,"Commentaire envoyé et soumis à validation.");
							domattr.set(this.textCommentaire, "value", "");
							setTimeout(lang.hitch(this,function(){
								baseFx.fadeOut(
									{ 
										duration: 700,
										node: this.sendStatus,
										onEnd:lang.hitch(this,function(){
											domattr.set(this.sendStatus, "value", "");
										})
									}
								).play();
								
							}), 3000);
						}
						else
						{
							html.set(this.sendStatus,"Une erreur technique empêche la soumission du commentaire.");
						}
					}),
					error: lang.hitch(this,function() {
						html.set(this.sendStatus,"Une erreur technique empêche la soumission du commentaire.");
					})
					
				});

                this._inactivePlaceHolder();
				
			},
			_leftSliderClick:function()
			{
				
				if(this.isSliderMove)
					return;

				var currentLeftPos = domGeometry.getMarginBox(this.tableSliderNode).l;

				if(currentLeftPos >= 0)
					return;

				fx.slideTo({
					duration: 700,
					node:this.tableSliderNode,
					top: domGeometry.getMarginBox(this.tableSliderNode).t.toString(),
					left:(currentLeftPos + this.widthSlider).toString(),
					unit: "px",
					beforeBegin: lang.hitch(this,function(){
						this.isSliderMove = true;
					}),
					onEnd:lang.hitch(this, function(){
						this.isSliderMove = false;
					})
				}).play();
				
				this.widthSumLimit -= this.widthSlider;
			},
			
			_rightSliderClick:function(){
				var width = domStyle.get(this.tableSliderNode, "width");
				var left = domStyle.get(this.tableSliderNode, "left");

				console.log(width);
				console.log(left);
				console.log(this.widthSlider);

				if(width + left < this.widthSlider)
					return;

				if(this.isSliderMove)
					return;

				fx.slideTo({
					duration: 700,
					node:this.tableSliderNode,
					top: domGeometry.getMarginBox(this.tableSliderNode).t.toString(),
					left:(domGeometry.getMarginBox(this.tableSliderNode).l - this.widthSlider).toString(),
					unit: "px",
					beforeBegin: lang.hitch(this,function(){
						this.isSliderMove = true;
					}),
					onEnd:lang.hitch(this, function(){
						this.isSliderMove = false;
					})
				}).play();
				
				this.widthSumLimit += this.widthSlider;
			},
			
			_getNextCounter:function(){
				if((this.currentPos + 1) >= this.listImage.length)
					return;
				
				this.currentPos++;
				this.mainPictureNode.src = this.listImage[this.currentPos].url;
				
				// Déplace le slider si l'image n'est pas visible
				var leftSize = this._countWidthSize(this.currentPos);
				
				if(leftSize > this.widthSumLimit)
				{
					this._rightSliderClick();
				}
				
				// Met à jour les commentaire
				this._displayCommentaire(this.listImage[this.currentPos].id);
			},
			
			_getPreviousCounter:function(){
				if((this.currentPos - 1) < 0)
					return;
				
				this.currentPos--;
				this.mainPictureNode.src = this.listImage[this.currentPos].url
				
				// Déplace le slider si l'image n'est pas visible
				var leftSize = this._countWidthSize(this.currentPos);
				
				if(leftSize < (this.widthSumLimit - this.widthSlider))
				{
					this._leftSliderClick();
				}
				this._displayCommentaire(this.listImage[this.currentPos].id);
			},
			
			_setCurrentMainImage:function(index)
			{
				this.currentPos = index;
				this.mainPictureNode.src = this.listImage[this.currentPos].url
				
			},
			
			_initFist:function(nomRubrique){
				this.mainPictureNode.src = this.listImage[0].url;
				this.titleNode.innerHTML = nomRubrique;
			},
	
			_printRubrique:function(){
				this.listRubrique.forEach(lang.hitch(this, "_addLink"));
			},
			
			_addLink:function(rubrique){
				
				var liNode = domConstruct.create("li");
				
				var a = domConstruct.create("a",{
					innerHTML:rubrique.nom,
					title:rubrique.nom
				},liNode);

                this.listRubriqueLink.push(a);
                on(a,"click", lang.hitch(this,"_cleanUpRubriqueLink"));
                on(a,"click", this._activeRubriqueLink);

				var event = {
					url: this.root+"photo/rubrique-photo/"+rubrique.id,
					handleAs: "json",
					load: lang.hitch(this,function imagesRubriqueLoaded(listImage){
						this.setListImage(listImage);
						this.currentPos = 0;
						this._initFist(rubrique.nom);
						
						this._printPhotoSlider();
						
						this._displayCommentaire(listImage[0].id);
						
						//Iniatlisation de la somme contextuelle maximal pour le slider
						this.widthSumLimit = this.widthSlider;
					})
				};
				
				on(a,"click", function(){
					xhr.get(event);
				}
				);
				
				domConstruct.place(liNode,this.rubriqueNode);
			},
            _activeRubriqueLink:function(){
                domattr.set(this, "class", "active");
            },
            _cleanUpRubriqueLink:function(){
                dojo.forEach(this.listRubriqueLink, function(item, i){
                    domattr.set(item, "class", "");
                });
            },
			_displayCommentaire:function(idImage)
			{
				xhr.get({
						url: this.root+"commentaire/"+idImage,
						handleAs: "json",
						load:lang.hitch(this,function(listCommentaire){
							this.listCommentaire = listCommentaire;
							this._printCommentaireList();
						})
				});
			},
	
			setRubrique:function(listRubrique){
				this.listRubrique = listRubrique;
			},
	
			setListImage:function(listImage){
				this.listImage = listImage;
			},
			
			_countWidthSize:function(maxIndex){
				var totalWidth = 0;
				this.listImage.some(lang.hitch(this,function(image){
					var currentIndex = this.listImage.indexOf(image)
					if(currentIndex >= maxIndex)
						return false;
						
					totalWidth += image.sliderSize;
				}));
				return totalWidth;
			},
			
			_printPhotoSlider:function(){
				this.tableSliderNode.innerHTML = "";
				
				//pos par defaut
				domStyle.set(this.tableSliderNode, "width",this.widthSlider);
				domStyle.set(this.tableSliderNode, "left",0);
				
				this.listImage.forEach(lang.hitch(this,function(image){
					
					var div = domConstruct.create("div",{
						className:"slideImage"
					});
					
					var a = domConstruct.create("a", {
						rel:this.listImage.indexOf(image)
					},div);
					
					var img = domConstruct.create("img",{
						src:image.url
					},a);





					on(a,"click", lang.hitch(this,function(evt){
						var indexCurrentImageClicked = evt.target.parentNode.rel;
						this._setCurrentMainImage(parseInt(indexCurrentImageClicked));
						
						// Affichage des commentaire correspondant
						this._displayCommentaire(image.id);
					}));
					
					domConstruct.place(div,this.tableSliderNode);
					
					// Affectation de la taille des images dans le slider (sert à déplacer automatiquement le slider)
					var width = domStyle.get(img, "width");


					var imgWidth = domStyle.get(img, "width");
					var sliderMovingPartWidth = domStyle.get(this.tableSliderNode, "width");
					var sliderGrowthWidth = sliderMovingPartWidth + imgWidth;

					console.log(width);
					domStyle.set(this.tableSliderNode, {
						width: sliderGrowthWidth
					});

					image.sliderSize = width;
				}));
				
			},
			_printCommentaireList:function()
			{
				this.panelCommentaireNode.innerHTML = "";
				
				this.listCommentaire.forEach(lang.hitch(this,function(commentaire){
					
					var divBox = domConstruct.create("div",{
						className:"boxCommentaire"
					});
					
					domConstruct.create("div",{
						className:"textCommentaire",
						innerHTML:commentaire.text
					},divBox);
					
					domConstruct.create("div",{
						className:"timeCommentaire",
						innerHTML:"le : "+commentaire.date
					},divBox);
					
					domConstruct.place(divBox,this.panelCommentaireNode);
					
				}));
				
			},
            
			start:function(){
				this._printRubrique();
				this._initFist(this.listRubrique[0].nom);
				this._printPhotoSlider();
				this._printCommentaireList();
			}
		});
	});





