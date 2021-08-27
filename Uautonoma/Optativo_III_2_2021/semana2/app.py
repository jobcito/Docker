from flask import Flask

app = Flask(__name__)

@app.route('/')
def hello_world():
    return '<h1>Hola desde Flask 26-08-2021</h1>'