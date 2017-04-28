@extends('spark::layouts.app')

@section('content')
    <clients inline-template>

        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Clients overview
                            <a class="pull-right" href="{{ url('clients/create') }}">Create new client</a>
                        </div><!-- panel-heading -->
                        <div class="panel-body">

                            <client-edit :edit-client-data="editFormData" v-if="showEditClient"></client-edit>

                            <span v-if="clients == 0">There is no clients created yet!</span>

                            <table v-else class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Company</th>
                                    <th>Email</th>
                                    <th>Contact person</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>

                                <tr v-for="client in clients">
                                    <td>@{{ client.company }}</td>
                                    <td>@{{ client.email }}</td>
                                    <td>@{{ client.contact_person }}</td>

                                    <!-- Edit Button -->
                                    <td>
                                        <button class="btn btn-primary" @click="edit(client)">
                                            <i class="fa fa-pencil"></i>
                                        </button>
                                    </td>
                                    <!-- Delete Button -->
                                    <td>
                                        <button class="btn btn-danger-outline" @click="deleteClient(client)">
                                        <i class="fa fa-times"></i>

                                        </button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div><!-- panel-body -->
                    </div><!-- panel -->
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </clients>
@endsection
