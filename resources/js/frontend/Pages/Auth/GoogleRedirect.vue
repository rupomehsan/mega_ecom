<template>
    <div>
        <h1>Welcome, {{ user.name }}</h1>
        <p>Your access token: {{ token }}</p>
        <!-- Further actions based on user and token data -->
    </div>
</template>

<script>
export default {
    props: {
        token: String,
        user: Object,
    },
};
</script>
