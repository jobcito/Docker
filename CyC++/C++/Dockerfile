ARG VERSION=latest

FROM gcc:${VERSION}

COPY . /usr/src/ejemplos

WORKDIR /usr/src/ejemplos

RUN g++ -o HolaMundo_cmasmas HolaMundo.cpp

CMD ["./HolaMundo_cmasmas"]
