<script setup lang="ts">
import { Search } from 'lucide-vue-next';
import Input from '../ui/input/Input.vue';
import { useForm } from '@inertiajs/vue3';

const form = useForm<{ search: string }>({
  search: '',
});
</script>

<template>
  <form class="w-2/3 sm:w-1/2 relative">
    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
      <Search :size="20" class="text-gray-500" />
    </div>
    <Input
      v-model="form.search"
      type="text"
      class="py-5 pl-10 border-gray-300 placeholder:text-gray-500 shadow-sm rounded-lg"
      autocomplete
      placeholder="Buscar socio por código o nombre..."
    />
  </form>
</template>
