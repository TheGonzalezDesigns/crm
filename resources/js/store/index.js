export default {
    state: {
        project: {},
        tasks: []
    },
    getters: {
        project: state => {
            return state.project;
        },
        tasks: state => {
            return state.tasks
        }
    },
    actions: {
        project(state, data) {
            return state.project = data;
        },
        tasks(state, data) {
            return state.tasks = data;
        }
    },
    mutations: {
        project(state,data) {
            return state.project = data;
        },
        tasks(state, data) {
            return state.tasks = data;
        }
    }
}
