<template>
    <!-- Show preview invoice -->
    <invoice-preview :item="form" v-if="invoicePreview"></invoice-preview>

    <div v-else class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <div  class="panel panel-default">
                    <div class="panel-heading">
                        Invoice create
                        <a class="pull-right" href="#" @click.prevent="back">Back to invoices</a>
                    </div><!-- panel-heading -->
                    <div class="panel-body">
                        <form class="form-horizontal">
                            <div class="col-md-6">
                                <!-- Client list -->
                                <div class="form-group" :class="{'has-error': form.errors.has('client')}">
                                    <label for="client" class="col-sm-2 control-label">Client</label>
                                    <div class="col-sm-10">
                                        <multiselect id="client" v-model="form.client" :options="clients" placeholder="Select client" label="company" track-by="company"></multiselect>
                                        <span class="help-block" v-show="form.errors.has('client')">
                                            {{ form.errors.get('client') }}
                                        </span>
                                    </div><!-- col-sm-10 -->
                                </div><!-- form-group -->

                                <!-- Date -->
                                <div class="form-group" :class="{'has-error': form.errors.has('date')}">
                                    <label for="date" class="col-sm-2 control-label">Date</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <date-picker id="date" v-model="form.date" :option="option"></date-picker>
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        </div><!-- input-group -->
                                        <span class="help-block" v-show="form.errors.has('date')">
                                            {{ form.errors.get('date') }}
                                        </span>
                                    </div><!-- col-sm-10 -->
                                </div><!-- /.form-group -->

                            </div><!-- /.col-md-6 -->
                            <div class="col-md-6">
                                <!-- Notes -->
                                <div class="form-group">
                                    <label for="notes" class="col-sm-2 control-label">Notes</label>
                                    <div class="col-sm-10">
                                        <textarea v-model="form.notes" name="notes" id="notes" class="form-control" rows="10"></textarea>
                                    </div>
                                </div><!-- /.form-group -->
                            </div><!-- /.col-md-6 -->

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
                                            <button type="submit" class="btn btn-danger-outline" @click.prevent="remove(item)">
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
                                            <dt>
                                            <h3>Total price</h3></dt>
                                            <dd><h1>{{ total | currency }}</h1></dd>
                                        </dl>
                                    </tr>
                                </table>

                                <button @click.prevent="create" type="submit" class="btn btn-primary pull-right">Preview invoice</button>

                            </div><!-- /.col-md-12 -->
                        </form>
                    </div><!-- panel-body -->
                </div><!-- panel -->
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</template>

<style>
    /**
    * Overwrite the date-picker component.
     */
    .cov-vue-date {
        display: block !important;
    }
</style>

<script>
    import axios from 'axios'
    import Multiselect from 'vue-multiselect'
    import myDatepicker from 'vue-datepicker2'
    import InvoicePreview from './invoice-preview.vue'

    export default {
        name: 'InvoiceCreate',

        data () {
            return {
                invoicePreview: false,
                clients       : [],
                form          : new SparkForm({
                    client: {},
                    notes : '',
                    date  : '',
                    items : [],
                    amount: null
                }),

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
                    },
                    dismissible: true // as true as default
                },
                timeoption : {
                    type  : 'min',
                    week  : ['Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa', 'Su'],
                    month : ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                    format: 'YYYY-MM-DD HH:mm'
                },
                multiOption: {
                    type  : 'multi-day',
                    week  : ['Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa', 'Su'],
                    month : ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                    format: "YYYY-MM-DD HH:mm"
                },
            };
        },

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

        mounted () {
            // Add a start item for the user.
            this.form.items.push({ quantity: 1, description: '', price: '' })

            // Listen for preview-invoice component.
            Bus.$on('invoicePreview', (state) => {
              this.invoicePreview = state
            })

            // Load clients.
            this.loadClients()
        },

        components: {
            Multiselect,
            'date-picker': myDatepicker,
            InvoicePreview
        },

        methods: {
            /**
             * Load customers.
             **/
            loadClients () {
                axios.get('/loadClients').then(response => {
                    this.clients = response.data
                })
                    .catch(error => {
                        console.log('error');
                        console.log(error);
                    })
            },

            /**
             * Create invoice
             **/
            create () {

                this.form.amount = this.total

                Spark.post('/invoices/validateInvoice', this.form)
                    .then(response => {
                        // Show preview view.
                        this.invoicePreview = true
                    })
                    .catch(error => {

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
            remove (item) {
                this.form.items.splice(item, 1)
            },

            /**
             * Go back to invoice lists.
             */
            back () {
                Bus.$emit('invoiceCreate', false)
            }
        }
    }
</script>
