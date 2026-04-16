<script setup lang="ts">
import { initials } from '@/lib/utils';
import type { Member } from '@/types';
import { CreditCard, Hash } from 'lucide-vue-next';
import Button from '../ui/button/Button.vue';

defineProps<{ member: Member }>();
</script>

<template>
  <div class="relative rounded-lg border border-gray-200 bg-white shadow-sm p-6">
    <!-- Status Badge -->
    <div class="absolute top-4 right-4">
      <span class="inline-flex items-center rounded-full bg-green-100 px-3 py-0.5 text-sm font-medium text-green-800">
        {{ member.status ?? 'Activo' }}
      </span>
    </div>

    <div class="space-y-3">
      <!-- Card Header -->
      <div class="flex items-center gap-3.5">
        <div
          class="h-20 w-20 flex items-center justify-center overflow-hidden rounded-full border border-gray-200 bg-gray-100">
            <img
              v-if="member.photo"
              :src="`/storage/${member.photo}`"
              class="h-full w-full object-cover"
              alt="member image"
            />
          <span v-else class="text-lg font-semibold text-gray-600">
            {{ initials(member.name) }}
          </span>
        </div>
        <div>
          <h3 class="text-lg font-medium text-gray-800">
            {{ member?.name }}
          </h3>
        </div>
      </div>

      <!-- Card Body -->
      <div class="space-y-4 py-3">
        <!-- Code -->
        <div>
          <div class="mb-1 flex items-center gap-0.5 text-xs font-semibold tracking-wide text-gray-500 uppercase">
            <Hash :size="15" />
            <span>Código:</span>
          </div>
          <p class="ml-1.5 font-medium text-gray-800">
            {{ member.code }}
          </p>
        </div>

        <!-- Membership Type -->
        <div>
          <div class="mb-1 flex items-center gap-1 text-xs font-semibold tracking-wide text-gray-500 uppercase">
            <CreditCard :size="15" />
            <span>Membresía:</span>
          </div>
          <p class="ml-1.5 font-medium text-gray-800">
            {{ member.current_membership?.membership_type.name ?? '---' }}
          </p>
        </div>
      </div>

      <!-- Footer -->
      <div class="flex items-center justify-end gap-3">
        <Button variant="outline">
          Editar
        </Button>
        <Button variant="outline">
          Ver
        </Button>
      </div>
    </div>
  </div>
</template>
