import Api from "./Api";

export default {
  register(form) {
    return Api().post("/auth/register", form);
  },

  login(form) {
    return Api().post("/auth/login", form);
  },
  upload(form) {
    return Api().post("/user/store-file", form, {
      headers: {
        'Content-Type': 'multipart/form-data',
      }
    });
  },
  logout() {
    return Api().get("/auth/logout");
  },
  auth() {
    return Api().get("/user");
  },
  getFiles() {
      return Api().get("/user/check-result");
  },
  getTable(id) {
      return Api().get(`/user/check-result/${id}`);
  },
  getControl(id) {
    return Api().get(`/user/check-bad-result/${id}`);
  },
  getFilesUser(id) {
      return Api().get(`/user/myTests/${id}`);
  },
  genPdf(id) {
      return Api().get(`/user/genPdf/${id}`);
  },
  getPdf(id) {
    return Api().get(`/user/getUrl/${id}`);
  },
  reportPdf(id) {
    return Api().get(`/user/pdf-reports/${id}`);
  }
};

