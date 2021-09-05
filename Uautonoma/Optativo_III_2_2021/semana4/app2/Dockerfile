FROM python:3.8.5-alpine3.12

RUN mkdir -p /usr/src/app

WORKDIR /usr/src/app

COPY ./requirements.txt /usr/src/app/requirements.txt

RUN pip install -r requirements.txt

EXPOSE 5000

COPY ./app.py /usr/src/app/app.py

CMD ["flask", "run", "--host=0.0.0.0"]
