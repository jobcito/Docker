from flask import Blueprint
from project import db
from project.users.models import User
from project.users.serializers import user_schema


user_blueprint = Blueprint('users', __name__)


@user_blueprint.route('/users', methods=['POST'])
def create():
    user = User(name='Francisco', email='a@a.cl')

    db.session.add(user)
    db.session.commit()

    return user_schema.dump(user), 201
