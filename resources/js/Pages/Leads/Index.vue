<template>
    <Layout>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Leads</h1>
                </div>
                <div class="col-md-12">
                    <table class="table table-bordered bg-white">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone number</th>
                            <th>DOB</th>
                            <th>Package</th>
                            <th>Added On</th>
                            <th></th>
                        </tr>
                        <tr v-for="lead in leads" :key="lead.id">
                            <td>{{ lead.id }}</td>
                            <td>{{ lead.name }}</td>
                            <td>{{ lead.email }}</td>
                            <td>{{ lead.phone }}</td>
                            <td>{{ lead.dob }}</td>
                            <td>{{ lead.interested_package }}</td>
                            <td>{{ lead.created_at }}</td>
                            <td>
                                <Link :href="$route('lead.show', { lead })"><font-awesome-icon icon="caret-right"/></Link>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </Layout>
</template>

<script>
import Layout from './../../Shared/Layout';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { Link } from '@inertiajs/inertia-vue';

export default {
    name: 'Leads.Index',
    components: { Layout, FontAwesomeIcon, Link },
    props: {
        leads: {}
    }
}
</script>

<style>

</style>
