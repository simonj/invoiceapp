<template>
    <modal>
        <h4 class="modal-title" slot="header">Edit client</h4>
        <div slot="body">
            <form>
                <input name="_method" type="hidden" value="PUT">

                <!-- Date -->
                <div class="form-group" :class="{'has-error': form.errors.has('due_date')}">
                    <label for="due_date" class="control-label">Date</label>
                    <div class="input-group">
                        <date-picker id="due_date" v-model="form.due_date" :option="option"></date-picker>
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    </div><!-- input-group -->
                    <span class="help-block" v-show="form.errors.has('due_date')">
                        {{ form.errors.get('due_date') }}
                    </span>
                </div><!-- /.form-group -->

                <div class="form-group">
                    <label for="notes" class="col-sm-2 control-label">Notes</label>
                    <textarea v-model="form.notes" name="notes" id="notes" class="form-control" rows="10"></textarea>
                </div><!-- /.form-group -->


                <!-- items -->
                <div class="col-md-12">

                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Quantity</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th v-if="countInvoiceItems > 1"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(item, index) in form.items">
                            <td :class="{'has-error': form.errors.has('items.' + index + '.quantity')}">
                                <input v-model.number="item.quantity" type="number" name="quantity[]" class="form-control" placeholder="1">
                                <span class="help-block" v-show="form.errors.has('items.' + index + '.quantity')">
                                    {{ form.errors.get('items.' + index + '.quantity') }}
                                </span>
                            </td>
                            <td :class="{'has-error': form.errors.has('items.' + index + '.description')}">
                                <input v-model="item.description" type="text" name="description[]" class="form-control" placeholder="Description">
                                <span class="help-block" v-show="form.errors.has('items.' + index + '.description')">
                                    {{ form.errors.get('items.' + index + '.description') }}
                                </span>
                            </td>
                            <td :class="{'has-error': form.errors.has('items.' + index + '.price')}">
                                <input v-model.number="item.price" type="number" name="price[]" class="form-control" placeholder="Price">
                                <span class="help-block" v-show="form.errors.has('items.' + index + '.price')">
                                    {{ form.errors.get('items.' + index + '.price') }}
                                </span>
                            </td>
                            <td v-if="countInvoiceItems > 1" class="text-center">
                                <button type="submit" class="btn btn-danger-outline" @click.prevent="remove(index)">
                                    <i class="fa fa-trash-o"></i>
                                </button>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                    <button class="btn btn-primary-outline pull-right" @click.prevent="add"><i class="fa fa-plus"></i> Add item</button>

                    <br/>
                    <br/>
                    <br/>
                    <br/>

                    <!-- total price -->
                    <table class="table">
                        <tr class="text-right">
                            <dl>
                                <dt><h3>Total price</h3></dt>
                                <dd><h1>{{ total | currency }},-</h1></dd>
                            </dl>
                        </tr>
                    </table>
                </div><!-- col-md-12 -->
            </form>
        </div><!-- body -->

        <div slot="footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button v-if="spinner" style="font-size: 0.4em;" type="button" class="btn btn-primary">
                <i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>
            </button>
            <button v-else @click.prevent="update" type="button" class="btn btn-primary">Update</button>
        </div><!-- footer -->
    </modal>
</template>

<script>
    import Modal from './../Modal.vue'
    import myDatepicker from 'vue-datepicker2'

    // Start of the default export
    export default {
        name: 'invoiceEdit',

        props: ['invoiceData'],

        components: {
            Modal,
            'date-picker': myDatepicker,
        },


        // Any imported mixins
        mixins: [],

        data () {
            return {
                form: new SparkForm({
                    notes : '',
                    due_date  : '',
                    items : [],
                    amount: null
                }),

                spinner: false,

                // Data for datepicker
                date: {
                    time: '' // string
                },

                option     : {
                    type       : 'day',
                    week       : ['Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa', 'Su'],
                    month      : ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                    format     : 'DD-MM-YYYY',
                    placeholder: 'Select date',
                    buttons    : {
                        ok    : 'Ok',
                        cancel: 'Cancel'
                    },
                    inputStyle : {
                        'display'         : 'block',
                        'width'           : '100%',
                        'height'          : '36px',
                        'padding'         : '6px 12px',
                        'font-size'       : '14px',
                        'line-height'     : '1.6',
                        'color'           : '#555',
                        'background-color': '#fff',
                        'background-image': 'none',
                        'border'          : '1px solid #ccd0d2',
                        'border-radius'   : '4px',
                        'box-shadow'      : 'inset 0 1px 1px rgba(0, 0, 0, 0.075)',
                        'cursor'          : 'pointer'
                    },
                    dismissible: true // as true as default
                },
                timeoption : {
                    type  : 'min',
                    week  : ['Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa', 'Su'],
                    month : ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                    format: 'YYYY-MM-DD'
                },
                multiOption: {
                    type  : 'multi-day',
                    week  : ['Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa', 'Su'],
                    month : ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                    format: "YYYY-MM-DD"
                },
            }
        },

        // Methods that should be accessible to both instance and template
        methods: {

            /**
             * Update selected client.
             */
            update() {
                let event = Bus

                // Start the spinner effect on button.
                this.spinner = true

                // Set the total amount.
                this.form.amount = this.total

                Spark.put('invoices/' + this.form.id, this.form)
                    .then(response => {
                        // Show popup success message.
                        swal('Invoice has been updated', "success")

                        // Hide modal popup.
                        $('#modal').modal('hide');

                        // Stop the spinner effect on button.
                        this.spinner = false

                        // Load the updated invoices.
                        event.$emit('getInvoices')
                    })
                    .catch(error => {
                        console.log(error)
//                        swal("Oops...", "Something went wrong!", "error");
                    })
            },

            /**
             * Add item.
             */
            add () {
                this.form.items.push({ quantity: 1, description: '', price: '' })
            },

            /**
             * Remove selected item.
             */
            remove (index) {
                this.form.items.splice(index, 1)
            },
        },

        // Computed properties that returns a formatted value of some kind
        computed: {
            /**
             * Count how many items created.
             */
            countInvoiceItems() {
                let invoiceItemsCount = 0;

                _.each(this.form.items, function(itemsCount) {
                    invoiceItemsCount += 1;
                });

                return invoiceItemsCount;
            },

            /**
             * Total cost.
             **/
            total () {

                return this.form.items.reduce(function(sum, item) {
                    return sum + item.quantity * item.price;
                }, 0);
            }
        },

        // Custom watchers
        watch: {
            'invoiceData' (data) {
                this.form = new SparkForm(data)
            }
        },

        // Custom filters for displaying data
        filter: {},

        // Custom directives that can changes behaviour of HTML elements
        directives: {},

        // Vue instance lifecycle hooks
        // https://vuejs.org/v2/guide/instance.html#Lifecycle-Diagram
        beforeCreate () {
        },
        created () {
        },
        beforeMount () {
        },
        mounted () {
        },
        beforeUpdate () {
        },
        updated () {
        },
        beforeDestroy () {
        },
        destroyed () {
        }
    }

</script>
