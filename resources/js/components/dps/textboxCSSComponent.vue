<template>
    <div>
        <select name="classes" v-model="selected" id="" multiple @change="selectData">
            <option value="">Select Class</option>
            <option value="form-control" selected="selected">form-control</option>
            <option value="alert alert-danger">alert alert-danger</option>
            <option value="alert alert-success">alert alert-success</option>
            <option value="alert alert-warning">alert alert-warning</option>
        </select>
    </div>
</template>

<script>
import { mapState, mapMutations, mapGetters, mapActions } from "vuex";
export default {
    computed: {
        ...mapState([
            'selectedClass',
        ]),
    },
    data () {
        return {
            selected: []
        }
    },
    methods: {
        ...mapMutations([
            'CHANGE_SELECTED_CLASS'
        ]),
        selectData () {
            this.CHANGE_SELECTED_CLASS(this.selected)
        }
    }
}
</script>

<style>

</style>
