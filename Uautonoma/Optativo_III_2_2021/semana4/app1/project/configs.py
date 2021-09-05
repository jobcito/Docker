class BaseConfig:
    SQLALCHEMY_DATABASE_URI = 'postgres://postgres:postgres@postgres-db:5432/users'


class DevelopmentConfig(BaseConfig):
    SQLALCHEMY_ECHO = True


class ProductionConfig(BaseConfig):
    SQLALCHEMY_ECHO = False
