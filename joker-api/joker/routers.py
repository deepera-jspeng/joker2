class JokerRouter(object):
    def db_for_read(self, model, **hints):
        if model._meta.app_label == "joker_model":
            return "joker_models"
        else:
            return None

    def db_for_write(self, model, **hints):
        if model._meta.app_label == "joker_model":
            return "joker_models"
        else:
            return None

    def allow_relation(self, obj1, obj2, **hints):
        return None

    def allow_migrate(self, db, app_label, model=None, **hints):
        if app_label == "joker_model":
            return db == "joker_models"
        return None
