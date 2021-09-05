import os
from flask import Flask
from flask_sqlalchemy import SQLAlchemy
from flask_migrate import Migrate
from flask_marshmallow import Marshmallow


db = SQLAlchemy()
migrate = Migrate()
ma = Marshmallow()


def register_blueprints(app):
    from project.users.endpoints import user_blueprint
    from project.health.endpoints import health_blueprint

    app.register_blueprint(user_blueprint)
    app.register_blueprint(health_blueprint)


def create_app():
    app = Flask(__name__)

    app_config = os.getenv('APP_CONFIG')
    app.config.from_object(app_config)

    db.init_app(app)
    ma.init_app(app)
    migrate.init_app(app, db)

    register_blueprints(app)

    return app
