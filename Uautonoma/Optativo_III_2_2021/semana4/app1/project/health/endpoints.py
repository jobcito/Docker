from flask import Blueprint


health_blueprint = Blueprint('health', __name__)


@health_blueprint.route('/health', methods=['GET'])
def health():
    return 'OK', 200
