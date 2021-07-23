export default {
    state: {
        project: {}
    },
    getters: {
        project: state => {
            return state.project;
        }
    },
    actions: {
        project(state, data) {
            return state.project = data;
        }
    },

    mutations: {
        project(state,data) {
            return state.project = data;
        }
    }
}
