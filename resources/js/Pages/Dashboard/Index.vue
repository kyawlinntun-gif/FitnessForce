<template>
    <Layout>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p>This is dashboard, welcome {{ $page.props.auth.user.name }}</p>
                </div>
            </div>

            <ReminderList :reminders="reminders"></ReminderList>
        </div>
    </Layout>
</template>

<script>
import Layout from './../../Shared/Layout';
import ReminderList from './ReminderList';

export default {
    name: 'Dashboard.Index',
    components: { Layout, ReminderList },
    props: {
        reminders: Array
    },
}
</script>

<style>

</style>
