<template>
    <Layout>
        <div class="container">
            <form @submit.prevent="handleSubmit">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" placeholder="Enter name" v-model="lead.name" tabindex="1" id="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="number" placeholder="Enter phone" v-model="lead.phone" tabindex="3" id="phone" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="interested_package">Interested Package</label>
                            <input type="text" placeholder="Enter the package interested in" v-model="lead.interested_package" tabindex="5" id="interested_package" class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Update</button>
                            <Link href="/leads" class="btn btn-warning">Back</Link>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" placeholder="Enter email" v-model="lead.email" tabindex="2" id="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="dob">Birthday</label>
                            <input type="date" v-model="lead.dob" placeholder="yyyy-mm-dd" tabindex="4" id="dob" class="form-control">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </Layout>
</template>

<script>
import Layout from './../../Shared/Layout';
import { Link } from '@inertiajs/inertia-vue';

export default {
    name: 'Lead.View',
    props: {
        errors: [],
        leadProp: []
    },
    components: { Layout, Link },
    methods: {
        async handleSubmit() {
            let response = await this.$inertia.put(`/leads/${this.lead.id}`, this.lead);
        }
    },
    data() {
        return {
            lead: {
                name: '',
                email: '',
                phone: '',
                dob: '',
                interested_package: ''
            }
        }
    },
    created() {
        this.lead = this.leadProp;
    }
}
</script>

<style>

</style>
