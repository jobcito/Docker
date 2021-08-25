import requests
from flask import Flask


app = Flask(__name__)


@app.route('/')
def hello_world():
    print('*******ANTES')
    response = requests.get('http://app1:5000')
    print('******DESPUES')

    return response.text
