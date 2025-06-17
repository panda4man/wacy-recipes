<template>
    <div>
        <h1>Recipes</h1>
        <p>Welcome to the recipes page!</p>
        <p>Here you can find a variety of delicious recipes to try out.</p>

        <input v-model="search" placeholder="Search recipes..." @input="fetchRecipes" />
        <ul>
            <li v-for="recipe in recipes" :key="recipe.slug">
                <NuxtLink :to="`/recipes/${recipe.slug}`">{{ recipe.name }}</NuxtLink>
            </li>
        </ul>
    </div>
</template>

<script setup>
    const search = ref('')
    const recipes = ref([])

    const fetchRecipes = async () => {
        const { data } = await useFetch(`/api/recipes?q=${search.value}`, {
            baseURL: 'http://localhost:8000',
        })
        recipes.value = data.value?.data || []
    }

    onMounted(fetchRecipes)
</script>