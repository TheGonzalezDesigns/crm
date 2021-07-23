<template lang="pug">
    mdb-container(fluid).flex-cheat#root
        mdb-row.align-self-center
            mdb-col
                LeftBody
            mdb-col.flex-cheat
                RightBody.align-self-center
</template>

<script>
import LeftBody from "./LeftBody";
import RightBody from "./RightBody";
import { mdbContainer, mdbRow, mdbCol } from "mdbvue";

export default {
    name: "Body",
    components: {
        LeftBody,
        RightBody,
        mdbContainer,
        mdbRow,
        mdbCol
    }
};
</script>

<style lang="stylus" scoped>

</style>
