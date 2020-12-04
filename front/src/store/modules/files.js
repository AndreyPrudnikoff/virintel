import User from "@/apis/User";

export default {
    actions: {
        async getFileList(ctx) {
            const filesName = await User.getFiles();
            ctx.commit("GET_FILES", filesName.data);
        },
        async startGenerate(ctx, id) {
            const response = await User.genPdf(id);
            ctx.commit("GEN_PDF", response.data.message);
        },
        async getFilesPatient(ctx, id) {
            const response = await User.getFilesUser(id);
            ctx.commit("FILE_FOR_USER", response.data);
        },
        async pdfLink(ctx, id) {
            const response = await User.getPdf(id);
            ctx.commit("GET_PDF", response)
        },
    },
    mutations: {
        GET_FILES(state, files) {
            state.fileList.files = files;
        },
        GEN_PDF(state, message) {
            state.fileList.message = message;
        },
        FILE_FOR_USER(state, filesUser) {
            state.fileList.filesUser = filesUser;
        },
        GET_PDF(state, link) {
            state.fileList.link = link;
        },
        SORTED_FILES(state, {key, compare}) {
            let fn = () => {
                let f;
                if (compare) {
                    f = (a, b) => a[key] > b[key] ? 1 : -1
                } else {
                    f = (a, b) => a[key] < b[key] ? 1 : -1
                }
                return f;
            }
            fn().bind(null, {key, compare})

            let a = [];
            for (let file in state.fileList.files) {
                if (state.fileList.files.hasOwnProperty(file)) {
                    a.push(state.fileList.files[file]);
                } else {
                    a = state.fileList.files;
                }
            }
            state.fileList.files = a.sort(fn({key, compare}));
        }
    },
    state: () => ({
        fileList: {
            files: [],
            message: '',
            filesUser: [],
            link: ''
        }
    }),
    getters: {
        isFiles(state) {
            let a = [];
            for (let file in state.fileList.files) {
                if (state.fileList.files.hasOwnProperty(file)) {
                    a.push(state.fileList.files[file]);
                } else {
                    a = state.fileList.files;
                }
            }
            return a;
        },
        pdfDownloaded(state) {
            return state.fileList.message;
        },
        fileListUser(state) {
            return state.fileList.filesUser;
        },
        pdfDownload(state) {
            return state.fileList.link;
        }
    }
}
