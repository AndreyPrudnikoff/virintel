import User from "@/apis/User";

export default {
    actions: {
        async authUser(ctx) {
            const response = await User.auth();
            ctx.commit('AUTH_USER', response.data);
        }
    },
    mutations: {
        LOGIN(state, status) {
            state.auth.login = status;
            state.auth.user = [];
        },
        AUTH_USER(state, user) {
            state.auth.user = user;
        },
    },
    state: () => ({
        auth: {
            login: false,
            user: [],
        }
    }),
    getters: {
        isLoggedIn(state) {
            return state.auth.login;
        },
        isUser(state) {
            return state.auth.user;
        },
        path(state) {
            switch (state.auth.user.role) {
                case 'user':
                    return '/patient/profile'
                case 'doctor':
                    return '/doctor/profile'
                case 'admin':
                    return '/admin'
                case 'laboratory':
                    return '/assistant/profile'
                default:
                    return '/login'
            }
        }
    }
}
