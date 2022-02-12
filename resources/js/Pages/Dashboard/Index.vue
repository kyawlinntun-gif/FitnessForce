<template>
    <Layout>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div>This is dashboard, welcome {{ fname }}, {{ lname }}</div>
                </div>
            </div>
        </div>
    </Layout>
</template>

<script>
import Layout from './../../Shared/Layout';

export default {
    name: 'Dashboard.Index',
    components: { Layout },
    props: ['fname', 'lname'],
}
</script>

<style>

</style>
