<template>
    <div class="rating-box">
        <span
            class="rating-star"
            :class="rating <= 0 ? 'empty-star' : rating < 0.5 ? 'half-star' : 'full-star'"
        ></span>
        <span
            class="rating-star"
            :class="rating < 1 ? 'empty-star' : rating < 1.5 ? 'half-star' : 'full-star'"
        ></span>
        <span
            class="rating-star"
            :class="rating < 2 ? 'empty-star' : rating < 2.5 ? 'half-star' : 'full-star'"
        ></span>
        <span
            class="rating-star"
            :class="rating < 3 ? 'empty-star' : rating < 3.5 ? 'half-star' : 'full-star'"
        ></span>
        <span
            class="rating-star"
            :class="rating < 4 ? 'empty-star' : rating < 4.5 ? 'half-star' : 'full-star'"
        ></span>
    </div>
</template>

<script>
export default {
    name: "starRating",
    props: ["rating"],
};
</script>

<style></style>
