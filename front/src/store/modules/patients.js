import User from "@/apis/User";

export default {
    actions: {
        async showResults(ctx, id) {
            try {
                const response = await User.getTable(id)
                const array = await response
                ctx.commit("GET_PATIENTS", array.data.result);
            } catch (e) {
                console.error(e)
            }
        },
        async viewReports(ctx, id) {
            const response = await User.reportPdf(id);
            ctx.commit("GET_PATIENTS", response.data);
        },
        async showBadResults(ctx, id) {
            const response = await User.getControl(id)
            const value = await response
            ctx.commit("GET_CONTROLS", value.data);
        }
    },
    mutations: {
        GET_PATIENTS(state, patients) {
            state.patientsList.patients = patients;
        },
        GET_CONTROLS(state, controls) {
            state.patientsList.controls = controls
        }
    },
    state: () => ({
        patientsList: {
            patients: [],
            controls: {}
        }
    }),
    getters: {
        isPatients(state) {
            return state.patientsList.patients
        },
        isBadControl(state) {
            return state.patientsList.controls
        }
    }
}
