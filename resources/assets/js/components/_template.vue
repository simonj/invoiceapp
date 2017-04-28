// This file is supposed to be a blueprint of how we write our
// vue-files. If there is anything missing. Please add in a
// sensible place and commit it to GitHub.

<template>
    <div>
        <h1>REMEMEBER THAT THERE CAN BE ONLY ONE ROOT ELEMENT</h1>
    </div>
</template>

<script>
    // Library imports
    import ... from ''

    // Component imports
    import ... from ''

    // Start of the default export
    export default {
        name: 'ComponentName',

        props: [] / {},

        components: {
            // Object of imported components that should
            // be accessed from the template.
        },

        // Any imported mixins
        mixins: [],

        data () {
            return {
                // Data always need to return an object
            }
        },

        // Methods that should be accessible to both instance and template
        methods: {
            // Remember to map library functions that you import here
            // if they should be accessed in the template.
        },

        // Computed properties that returns a formatted value of some kind
        computed: {
            // Use computed properties to access data in the Vuex store
        },

        // Custom watchers
        watch: {},

        // Custom filters for displaying data
        filter: {},

        // Custom directives that can changes behaviour of HTML elements
        directives: {},

        // Vue instance lifecycle hooks
        // https://vuejs.org/v2/guide/instance.html#Lifecycle-Diagram
        beforeCreate () {},
        created () {},
        beforeMount () {},
        mounted () {},
        beforeUpdate () {},
        updated () {},
        beforeDestroy () {},
        destroyed () {}
    }
</script>

<styles>
    // Optional styles
</styles>
