<template lang="pug">
    mdb-container.root(fluid)
        mdb-row
            mdb-col
                .profile
                    h1.h1-responsive.brown-text Welcome, Shauna
                    h4.h4-responsive.grey-text Select a project to continue!
                .search
                    .input-group.md-form.form-sm.form-1.pl-0
                        .input-group-prepend
                            span#basic-text1.input-group-text
                                mdbIcon(icon='search')
                        input.search.form-control.my-0.py-1(type='text', placeholder='Search your projects', aria-label='Search your projects' v-model="search")
        mdb-row.justify-content-center
            mdb-col.projects
                mdb-container(fluid)
                    mdb-row.text-center
                        mdb-col
                            h4.h4-responsive.grey-text
                                span Projects
                                span &ensp;
                                span (
                                span(v-text="filterProjects.length")
                                span )
                mdb-container(fluid).tabs
                    mdb-row.align-items-center
                        mdb-col.project.text-center(v-for="project in filterProjects" :key="project.id").justify-content-center(col="12")
                            mdb-btn(outline="mdb-color" size="lg" @click="selectProject(project)")
                                span(v-text="projInitials(project.title)").blue-grey-text
                            mdb-container(fluid)
                                mdb-row.no-gutters.align-items-center.justify-content-center
                                    mdb-col.text-center
                                        h5.h5-responsive.text-nowrap(v-text="project.title").project-title
</template>

<script>

import { mdbIcon, mdbRow, mdbCol, mdbContainer, mdbBtn } from 'mdbvue';

export default {
    name: "LeftBody",
    components: {
        mdbIcon,
        mdbRow,
        mdbCol,
        mdbContainer,
        mdbBtn
    },
    data() {
        return {
            projects: [],
            search: ''
        }
    },
    created(){
        this.fetchProjects();
    },
    methods: {
        fetchProjects() {
            fetch('/api/projects')
                .then((res)=>res.json())
                .then((data)=>{
                    this.projects = data.data;
                })
                .catch((err) => console.error(err));
        },
        fetchTasks(id) {
            fetch(`api/tasks/${id}`)
                .then((res) => res.json())
                .then((data) => {
                    this.$store.commit("tasks", data.data);
                })
                .catch((err) => console.error(err));
        },
        projInitials($title) {
            let length = $title.length;
            let initials = "";
            initials += $title.slice(0, 1);
            initials += $title.slice(length - 1, length);
            return initials;
        },
        selectProject($project) {
            this.fetchTasks($project.id);
            this.$store.commit("project", $project);
        }
    },
    computed: {
        filterProjects: function() {
            return this.projects.filter(project => project.title.toLowerCase().includes(this.search.toLowerCase()));
        }
    }
}
</script>
<style lang="stylus" scoped>
.root
    padding 2rem
.input-group
    &.md-form
        &.form-sm
            &.form-1
                input
                    border 1px solid #bdbdbd
                    border-top-right-radius 0.25rem
                    border-bottom-right-radius 0.25rem
                    background rgba(#546e7a,  0.3)

.projects
    .tabs
        padding 1rem
    .project
        border-radius 0.25rem
        .project-initials
            //background-image url("/images/icons/users.png")
.search::placeholder
.search::placeholder:focus
    color darken(white, 30%)
.search::hover //fix
    #basic-text1
        background rgba(#ffd180, 0.8)
#basic-text1
    background rgba(#ffd180, 0.4)
.tabs
    overflow-y scroll
    height 60vh
.project-title
    text-transform capitalize

</style>
