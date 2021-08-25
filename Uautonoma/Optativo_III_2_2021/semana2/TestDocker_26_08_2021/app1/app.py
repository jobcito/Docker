from flask import Flask


app = Flask(__name__)


@app.route('/')
def hello_world():
    print('************* DESDE APP1')
    return '<h1>Hola desde Flask que esta en APP1 pero APP2 la consulta y la expone en la Web</h1>'
