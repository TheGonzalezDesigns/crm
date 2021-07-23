<template lang="pug">
    mdb-container(fluid).root.max-height
        mdb-row.max-height.justify-content-center
            mdb-col.max-height(col="*").flex-cheat
                Body.body.align-self-center
</template>

<script>
    import Body from './Body';

    import {mdbContainer, mdbCol, mdbRow} from "mdbvue"

    export default {
        name: "App",
        components: {
            Body,
            mdbContainer,
            mdbCol,
            mdbRow
        }
    }
</script>

<style lang="stylus" scoped>
@import "~nib"
    .body
        padding 2rem
        background linear-gradient(top left, rgba(#f9fbe7, 0.95), rgba(#efebe9, 0.75))
        @media (min-width: 767px)
            border-radius 2rem
            min-height 70vh
            max-width 70vw

    .max-height
        min-height 100vh
    .root
        background-image url("https://images.unsplash.com/photo-1553605477-04e2d618d3d8?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80")
        background-position center
</style>
