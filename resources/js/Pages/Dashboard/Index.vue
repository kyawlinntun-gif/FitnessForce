<template>
    <div>
        This is dashboard, welcome {{ fname }}, {{ lname }}.
    </div>
</template>

<script>
export default {
    name: 'Dashboard.Index',
    props: ['fname', 'lname']
}
</script>

<style>

</style>
