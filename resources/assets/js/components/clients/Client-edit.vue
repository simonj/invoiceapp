<template>
    <div>

        <div class="alert alert-success" v-if="form.successful">
            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
            Your client has been updated!
        </div><!-- alert -->

        <form>
            <div class="form-group" :class="{'has-error': form.errors.has('company')}">
                <label class="control-label" for="company">Company
                    <small class="text-info">required</small>
                </label>
                <input type="text" class="form-control" name="company" id="company" v-model="form.company" placeholder="Insert company name">
                <span class="help-block" v-show="form.errors.has('company')">
                    @{{ form.errors.get('company') }}
                </span>
            </div><!-- form-group -->

        </form>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('client-edit Component mounted.')
        },

        data () {
            return {
                form : new SparkForm({
                    company       : '',
                    email         : '',
                    address1      : '',
                    address2      : '',
                    city          : '',
                    state         : '',
                    zipcode       : '',
                    country       : '',
                    contact_person: ''
                }),
            };
        },

        props: ['editClientData'],

        methods: {


        }
    }
</script>
