<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
import PlaceholderPattern from '@/components/PlaceholderPattern.vue';
import { Member } from '@/types';
import MemberCard from '@/components/app/MemberCard.vue';

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

		<div class="flex flex-1 flex-col gap-4 overflow-x-auto rounded-xl mb-5">
			<div class="grid auto-rows-min gap-4 md:grid-cols-3">
				<div
					class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
					<PlaceholderPattern />
				</div>
				<div
					class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
					<PlaceholderPattern />
				</div>
				<div
					class="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
					<PlaceholderPattern />
				</div>
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
