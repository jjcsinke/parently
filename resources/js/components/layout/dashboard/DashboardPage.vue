<template>
  <div>
    <h1><slot name="title">{{ $t('portal.dashboard.parent') }}</slot></h1>
    <slot name="default"></slot>
  </div>
</template>
