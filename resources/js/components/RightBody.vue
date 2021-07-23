<template lang="pug">
    mdb-container.root.cloudy-knoxville-gradient(fluid).no-gutters
        mdb-row
            mdb-col
                mdb-container(fluid style="height: 6vh")
                    mdb-row
                        mdb-col
                            h2.h2-responsive
                                span Project:
                                span &ensp;
                                span(v-text="this.$store.getters.project.title" style="text-transform: capitalize")
                mdb-container(fluid)
                    mdb-row
                        mdb-col
                            p(v-text="this.$store.getters.project.description")
                            br
                            br
        mdb-row.no-gutters
            mdb-col.no-gutters
                mdb-container
                    mdb-row
                        mdb-col
                            mdb-container(fluid)
                                mdb-row.align-items-center.justify-content-start
                                    mdb-col
                                        h2.h2-responsive
                                            span
                                                mdb-icon(icon="tasks" fa size="1x").m-1.grey-text
                                            span Today's Tasks
                                mdb-row
                                    mdb-col
                                        ul.task-list
                mdb-container(fluid).no-gutters
                    mdb-row.no-gutters
                        mdb-col.no-gutters
                            mdb-container(fluid)
                                mdb-row.align-items-center
                                    mdb-col(col="10")
                                        mdb-input(label="Add a new task" size="md" v-model="newTask")
                                    mdb-col(col="2")
                                        mdb-btn(tag='a' outline='success' floating size='sm' @click="addTask(newTask)")
                                            mdb-icon(fa icon="plus" size="1x").green-text
                            mdb-container(fluid).no-gutters
                                mdb-row.no-gutters.align-items-center.justify-content-center
                                    mdb-col.no-gutters
                                        mdb-list-group.task-list.no-gutters
                                            mdb-list-group-item(v-for="task in tasks" :key="task.id")
                                                mdb-container(fluid).task-list-item
                                                    mdb-row.task-list-item.align-items-center.justify-content-center
                                                        mdb-col(col="8")
                                                            mdb-container(fluid)
                                                                mdb-row.align-items-center.justify-content-start
                                                                    mdb-col
                                                                        mdb-btn(tag='a' outline='success' floating size='sm' @click="deleteTask(task.taskId)")
                                                                            mdb-icon(fa icon="check" size="1x").green-text
                                                                    mdb-col.task-title(col="8")
                                                                        h5.h5-responsive.text-capitalize {{task.title}}
                                                        mdb-col(col="4")
                                                            mdb-container(fluid)
                                                                mdb-row.align-items-center.justify-content-center.text-center
                                                                    mdb-col
                                                                        mdb-btn(tag='a' outline='danger' floating size='sm' @click="deleteTask(task.taskId)")
                                                                            mdb-icon(far icon="trash-alt" size="1x").red-text
                                        //mdb-accordion(table).task-list
                                            mdb-accordion-pane(:title='title(task.title)' type='table' :isOpen='openPaneNum==0' @pane-clicked='handlePaneOpened(0)' v-for="task in tasks" :key="task.id")
                                                mdb-dropdown(style='display: block', slot='title')
                                                    mdb-dropdown-toggle(color='info', slot='toggle', style='padding: 8px')
                                                        //mdb-icon(icon="pencil" size="1x").white-text
                                                        span &ensp;
                                                        mdb-icon(icon="pencil-alt" size="1x").white-text
                                                        span &ensp;
                                                    mdb-dropdown-menu(color='info')
                                                        mdb-dropdown-item
                                                            mdb-container(fluid)
                                                                mdb-row.align-items-center.justify-content-center
                                                                    mdb-col.flex-cheat
                                                                        mdb-btn(tag='a' outline='success' floating size='sm' @click="deleteTask(task.taskId)").align-self-center
                                                                            mdb-icon(fa icon="check" size="1x").green-text
                                                                    mdb-col.task-title(col="8")
                                                                        h5.h5-responsive.text-capitalize Mark Completed
                                                        mdb-dropdown-item
                                                            mdb-container(fluid)
                                                                mdb-row.align-items-center.justify-content-center
                                                                    mdb-col.flex-cheat
                                                                        mdb-btn(tag='a' outline='danger' floating size='sm' @click="deleteTask(task.taskId)").align-self-center
                                                                            mdb-icon(far icon="trash-alt" size="1x").red-text
                                                                    mdb-col.task-title(col="8")
                                                                        h5.h5-responsive.text-capitalize Delete Task
                                                    mdb-dropdown-item
                                                        mdb-container.table-ui.p-2.mb-3.mx-3.mb-4
                                                            mdb-row
                                                                mdb-col(xl='4', lg='6', md='12')
                                                                    mdb-select(:options="[\
                                                                  {value: 1, text: 'Delete'},\
                                                                  {value: 2, text: 'Change folder'}\
                                                                  ]")
                                                                mdb-col(xl='4', lg='6', md='6')
                                                                    mdb-select(:options="[\
                                                                  {value: null, text: 'Show only', disabled: true},\
                                                                  {value: 1, text: 'All (2000)', selected: true},\
                                                                  {value: 2, text: 'Clicks (200)'},\
                                                                  {value: 3, text: 'Page (1800)'},\
                                                                  {value: 4, text: 'Scroll (200)'},\
                                                                  {value: 5, text: 'Forms (50)'},\
                                                                  {value: 6, text: 'Time (50)'},\
                                                                  {value: 7, text: 'UTM (50)'}\
                                                                  ]")
                                                                mdb-col(xl='4', lg='6', md='6')
                                                                    mdb-select(:options="[\
                                                                  {value: 1, text: 'All (100)'},\
                                                                  {value: 2, text: 'Active (2000)'},\
                                                                  {value: 3, text: 'Inactive (1000)'}\
                                                                  ]")

</template>

<script>
import LeftBody from "./LeftBody";
import {mdbCol, mdbContainer, mdbRow, mdbIcon, mdbInput, mdbListGroup, mdbListGroupItem, mdbBtn, mdbAccordion, mdbAccordionPane,mdbDropdown, mdbSelect, mdbDropdownMenu, mdbDropdownToggle, mdbDropdownItem} from "mdbvue";

export default {
    name: "RightBody",
    components: {
        LeftBody,
        mdbContainer,
        mdbRow,
        mdbCol,
        mdbIcon,
        mdbInput,
        mdbListGroup,
        mdbListGroupItem,
        mdbBtn,
        mdbAccordion,
        mdbAccordionPane,
        mdbDropdown,
        mdbSelect,
        mdbDropdownMenu,
        mdbDropdownToggle,
        mdbDropdownItem
    },
    data(){
        return {
            tasks: [],
            newTask: "",
            project: {},
            elHeight: 0,
            openPaneNum: 0,
        }
    },
    created(){
        this.updateTasks();
    },
    methods: {
        updateTasks(){
            fetch('/api/upcoming')
                .then((res)=>res.json())
                .then((data)=>{
                    this.tasks = data.data;
                    console.warn('updated with:', data);
                })
                .catch((err) => console.error(err)); //Implement an error message to display to the user
        },
        deleteTask(taskId) {
            fetch(`/api/upcoming/${taskId}`, {
                method: 'DELETE',
            }).then(() => {
                this.updateTasks();
                console.log('Task Deleted', taskId);
            }).catch((err) => console.error(err));
        },
        addTask(data) {
            let taskId = Math.random().toString();
            taskId = taskId.slice(2, taskId.length <= 12 ? taskId.length : 12 );

            fetch(`/api/upcoming`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    title: data,
                    taskId: taskId,
                    completed: false,
                    description: ''
                })
            }).then(() => {
                this.updateTasks();
                this.newTask = '';
            }).catch((err) => console.error(err, taskId));
        },
        deleteTasks($taskId){
            fetch('/api/upcoming/{$taskId}')
                .then((res)=>res.json())
                .then((data)=>{
                    this.upcoming = data;
                })
                .catch((err) => console.log(err));
        },
        beforeEnter(el) {
            this.elHeight = el.scrollHeight;
        },
        enter(el) {
            el.style.height = this.elHeight+'px';
        },
        beforeLeave(el) {
            el.style.height = 0;
        },
        handlePaneOpened(num) {
            // if (this.openPaneNum == num) {return (this.openPaneNum = null);};
            //
            // this.openPaneNum = num;

            // this.openPaneNum = this.openPaneNum === num ? null : this.openPaneNum;
            // return this.openPaneNum;
            return this.openPaneNum = this.openPaneNum === num ? null : this.openPaneNum;
            // return this.openPaneNum;
        },
        title(data) {
            return data.toUpperCase();
        }
    },
}

</script>

<style lang="stylus" scoped>
.root
    border-radius 1.5rem
    padding 2rem
.plus
    color rgba(desaturate(#ffd180, 50%), 0.85)
.task-list
    overflow-y scroll
    @media (min-width: 767px)
        max-height 45vh
    @media (max-width: 767px)
        max-height 75vh
        .task-title
            font-size 3vmin
    .task-list-item
        min-height 5vh
</style>
