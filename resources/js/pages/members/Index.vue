<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import { Member } from '@/types';
import MemberCard from '@/components/app/MemberCard.vue';
import SearchForm from '@/components/app/SearchForm.vue';
import Button from '@/components/ui/button/Button.vue';
import { Plus } from 'lucide-vue-next';

defineOptions({
	layout: {
		breadcrumbs: [
			{
				title: 'Socios',
				href: '/members',
			},
		],
	},
});

defineProps<{ members: Member[] }>();
</script>

<template>
	<Head title="Socios" />

	<div class="flex justify-between items-center mt-4">
		<SearchForm />
		
		<div>
			<Button size="lg">
				<Plus class="mr-0.5 text-white" />
				Nuevo Socio
			</Button>
		</div>
	</div>

	<div class="grid grid-cols-1 gap-5 lg:grid-cols-2 xl:grid-cols-3">
		<MemberCard
			v-for="member in members"
			:member="member"
			:key="member.id"
		/>
	</div>
</template>
