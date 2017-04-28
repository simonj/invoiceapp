import axios from 'axios'

Vue.component('clients', {

    data () {
        return {
            clients       : [],
            showEditClient: false,
            editFormData: {},
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

    mounted () {
        this.getClients();
    },

    methods: {

        /**
         * Fetch clients.
         */
        getClients () {
            var that = this
            axios.get('loadClients').then(response => {
                that.clients = response.data
            })
            .catch(error => {
                console.log('error');
                console.log(error);
            });
        },

        /**
         * Create client
         */
        create() {
            Spark.post('/clients/', this.form)
                .then(response => {
                    //TODO: show a sweet alert
                })
                .catch(error => {
                    console.log(error);
                })
        },

        /**
         * Edit client.
         */
        edit(client) {
            console.log('clicked edit')
            this.showEditClient = true
            this.editFormData = client
        },

        /**
         * update client.
         */
        update() {
            Spark.post('/clients/', this.form)
                .then(response => {
                    //TODO: show a sweet alert
                })
                .catch(error => {
                    console.log(error);
                })
        },

        /**
         * Delete the specified client.
         */
        deleteClient(client) {
            //TODO: show sweet alert.
            axios.delete('/clients/' + client.id)
                .then(() => {
                    this.getClients();
                })
                .catch((error) => {
                    console.log('error');
                    console.log(error);
                });
        }
    }
});
