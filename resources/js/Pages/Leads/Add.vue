<template>
    <Layout>
        <div class="container">
            <form @submit.prevent="handleSubmit">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" placeholder="Enter name" v-model="leads.name" tabindex="1" id="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="number" placeholder="Enter phone" v-model="leads.phone" tabindex="3" id="phone" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="interested_package">Interested Package</label>
                            <input type="text" placeholder="Enter the package interested in" v-model="leads.interested_package" tabindex="5" id="interested_package" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" placeholder="Save">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" placeholder="Enter email" v-model="leads.email" tabindex="2" id="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="dob">Birthday</label>
                            <input type="date" v-model="leads.dob" placeholder="yyyy-mm-dd" tabindex="4" id="dob" class="form-control">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </Layout>
</template>

<script>
import Layout from './../../Shared/Layout';

export default {
    name: 'Lead.Add',
    props: {
        errors: []
    },
    components: { Layout },
    methods: {
        async handleSubmit() {
            let response = await this.$inertia.post('/leads/add', this.leads);
        }
    },
    data() {
        return {
            leads: {
                name: '',
                email: '',
                phone: '',
                dob: '',
                interested_package: ''
            }
        }
    }
}
</script>

<style>

</style>
