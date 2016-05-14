FROM httpd:2.4.20

COPY config/httpd.conf /usr/local/apache2/conf/
COPY config/sites-enabled/batiment.conf /usr/local/apache2/conf/extra/

RUN mkdir /var/log/apache2

RUN apt-get update \
  && apt-get -y install git \
  && apt-get -y install curl

ENV NPM_CONFIG_LOGLEVEL info
ENV NODE_VERSION 4.4.4

RUN curl -SLO "https://nodejs.org/dist/v$NODE_VERSION/node-v$NODE_VERSION-linux-x64.tar.gz" \
  && tar -xf "node-v$NODE_VERSION-linux-x64.tar.gz" -C /usr/local --strip-components=1 \
  && rm "node-v$NODE_VERSION-linux-x64.tar.gz"

RUN npm install -g bower

RUN echo '{ "allow_root": true }' > /root/.bowerrc

WORKDIR /usr/local/apache2/htdocs