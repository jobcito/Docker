FROM python:3.8.5-alpine3.12

RUN mkdir -p /usr/src/app

WORKDIR /usr/src/app

RUN pip install flask

EXPOSE 5000

COPY ./app.py /usr/src/app/app.py

CMD ["flask", "run", "--host=0.0.0.0"]
