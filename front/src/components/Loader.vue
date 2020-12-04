<template>
  <div class="window">
    <div class="wrapper">
      <h2>Loading...</h2>
      <div class="container">
        <div class="square"></div>
        <div class="square"></div>
        <div class="square"></div>
        <div class="square"></div>
        <div class="square"></div>
      </div>
    </div>
  </div>
</template>

<script>

export default {
  name: "Loader"
}
</script>

<style scoped>
.window {
  width: 100vw;
  height: 100vh;
  background-color: rgba(0,0,0,.3);
  position: fixed;
  top: 0;
  left: 0;
  z-index: 9999;
}

.wrapper {
  min-width: 20%;
  height: 200px;
  overflow: hidden;
  margin: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background-color: #ccc;
  padding: 5%;
  border-radius: 20px;
  cursor: pointer;
  box-shadow: 0 19px 38px rgba(0, 0, 0, 0.30), 0 15px 12px rgba(0, 0, 0, 0.22);
}

h2 {
  position: absolute;
  top: 15%;
  left: 50%;
  transform: translate(-50%, -50%);
}

.container {
  width: var(--container-size);
  padding: 2px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  position: relative;
}

.square {
  width: var(--box-size);
  height: var(--box-size);
  position: relative;
  display: block;
  -webkit-transform-origin: -50% center;
  transform-origin: -50% center;
  border-radius: var(--box-border-radius);
}

.square:after {
  content: '';
  width: 100%;
  height: 100%;
  position: absolute;
  top: 0;
  right: 0;
  background-color: #15416B;
  border-radius: var(--box-border-radius);
  box-shadow: 0px 0px 10px 0px rgba(28, 159, 255, 0.4);
}

.square:nth-child(1) {
  -webkit-animation: slide var(--duration) ease-in-out infinite alternate;
  animation: slide var(--duration) ease-in-out infinite alternate;
}

.square:nth-child(1):after {
  -webkit-animation: color-change var(--duration) ease-in-out infinite alternate;
  animation: color-change var(--duration) ease-in-out infinite alternate;
}

.square:nth-child(2) {
  -webkit-animation: flip-1 var(--duration) ease-in-out infinite alternate;
  animation: flip-1 var(--duration) ease-in-out infinite alternate;
}

.square:nth-child(2):after {
  -webkit-animation: squidge-1 var(--duration) ease-in-out infinite alternate;
  animation: squidge-1 var(--duration) ease-in-out infinite alternate;
}

.square:nth-child(3) {
  -webkit-animation: flip-2 var(--duration) ease-in-out infinite alternate;
  animation: flip-2 var(--duration) ease-in-out infinite alternate;
}

.square:nth-child(3):after {
  -webkit-animation: squidge-2 var(--duration) ease-in-out infinite alternate;
  animation: squidge-2 var(--duration) ease-in-out infinite alternate;
}

.square:nth-child(4) {
  -webkit-animation: flip-3 var(--duration) ease-in-out infinite alternate;
  animation: flip-3 var(--duration) ease-in-out infinite alternate;
}

.square:nth-child(4):after {
  -webkit-animation: squidge-3 var(--duration) ease-in-out infinite alternate;
  animation: squidge-3 var(--duration) ease-in-out infinite alternate;
}

.square:nth-child(5) {
  -webkit-animation: flip-4 var(--duration) ease-in-out infinite alternate;
  animation: flip-4 var(--duration) ease-in-out infinite alternate;
}

.square:nth-child(5):after {
  -webkit-animation: squidge-4 var(--duration) ease-in-out infinite alternate;
  animation: squidge-4 var(--duration) ease-in-out infinite alternate;
}

.square:nth-child(2):after {
  background-color: #15416B;
}

.square:nth-child(3):after {
  background-color: #15416B;
}

.square:nth-child(4):after {
  background-color: #15416B;
}

.square:nth-child(5):after {
  background-color: #15416B;
}

@-webkit-keyframes slide {
  0% {
    background-color: #15416B;
    -webkit-transform: translatex(0vw);
    transform: translatex(0vw);
  }
  100% {
    background-color: #15416B;
    -webkit-transform: translatex(calc(var(--container-size) - (var(--box-size) * 1.25)));
    transform: translatex(calc(var(--container-size) - (var(--box-size) * 1.25)));
  }
}

@keyframes slide {
  0% {
    background-color: #15416B;
    -webkit-transform: translatex(0vw);
    transform: translatex(0vw);
  }
  100% {
    background-color: #15416B;
    -webkit-transform: translatex(calc(var(--container-size) - (var(--box-size) * 1.25)));
    transform: translatex(calc(var(--container-size) - (var(--box-size) * 1.25)));
  }
}

@-webkit-keyframes color-change {
  0% {
    background-color: #15416B;
  }
  100% {
    background-color: #15416B;
  }
}

@keyframes color-change {
  0% {
    background-color: #15416B;
  }
  100% {
    background-color: #15416B;
  }
}

@-webkit-keyframes flip-1 {
  0%, 15% {
    -webkit-transform: rotate(0);
    transform: rotate(0);
  }
  35%, 100% {
    -webkit-transform: rotate(-180deg);
    transform: rotate(-180deg);
  }
}

@keyframes flip-1 {
  0%, 15% {
    -webkit-transform: rotate(0);
    transform: rotate(0);
  }
  35%, 100% {
    -webkit-transform: rotate(-180deg);
    transform: rotate(-180deg);
  }
}

@-webkit-keyframes squidge-1 {
  5% {
    -webkit-transform-origin: center bottom;
    transform-origin: center bottom;
    -webkit-transform: scalex(1) scaley(1);
    transform: scalex(1) scaley(1);
  }
  15% {
    -webkit-transform-origin: center bottom;
    transform-origin: center bottom;
    -webkit-transform: scalex(1.3) scaley(0.7);
    transform: scalex(1.3) scaley(0.7);
  }
  25%, 20% {
    -webkit-transform-origin: center bottom;
    transform-origin: center bottom;
    -webkit-transform: scalex(0.8) scaley(1.4);
    transform: scalex(0.8) scaley(1.4);
  }
  55%, 100% {
    -webkit-transform-origin: center top;
    transform-origin: center top;
    -webkit-transform: scalex(1) scaley(1);
    transform: scalex(1) scaley(1);
  }
  40% {
    -webkit-transform-origin: center top;
    transform-origin: center top;
    -webkit-transform: scalex(1.3) scaley(0.7);
    transform: scalex(1.3) scaley(0.7);
  }
}

@keyframes squidge-1 {
  5% {
    -webkit-transform-origin: center bottom;
    transform-origin: center bottom;
    -webkit-transform: scalex(1) scaley(1);
    transform: scalex(1) scaley(1);
  }
  15% {
    -webkit-transform-origin: center bottom;
    transform-origin: center bottom;
    -webkit-transform: scalex(1.3) scaley(0.7);
    transform: scalex(1.3) scaley(0.7);
  }
  25%, 20% {
    -webkit-transform-origin: center bottom;
    transform-origin: center bottom;
    -webkit-transform: scalex(0.8) scaley(1.4);
    transform: scalex(0.8) scaley(1.4);
  }
  55%, 100% {
    -webkit-transform-origin: center top;
    transform-origin: center top;
    -webkit-transform: scalex(1) scaley(1);
    transform: scalex(1) scaley(1);
  }
  40% {
    -webkit-transform-origin: center top;
    transform-origin: center top;
    -webkit-transform: scalex(1.3) scaley(0.7);
    transform: scalex(1.3) scaley(0.7);
  }
}

@-webkit-keyframes flip-2 {
  0%, 30% {
    -webkit-transform: rotate(0);
    transform: rotate(0);
  }
  50%, 100% {
    -webkit-transform: rotate(-180deg);
    transform: rotate(-180deg);
  }
}

@keyframes flip-2 {
  0%, 30% {
    -webkit-transform: rotate(0);
    transform: rotate(0);
  }
  50%, 100% {
    -webkit-transform: rotate(-180deg);
    transform: rotate(-180deg);
  }
}

@-webkit-keyframes squidge-2 {
  20% {
    -webkit-transform-origin: center bottom;
    transform-origin: center bottom;
    -webkit-transform: scalex(1) scaley(1);
    transform: scalex(1) scaley(1);
  }
  30% {
    -webkit-transform-origin: center bottom;
    transform-origin: center bottom;
    -webkit-transform: scalex(1.3) scaley(0.7);
    transform: scalex(1.3) scaley(0.7);
  }
  40%, 35% {
    -webkit-transform-origin: center bottom;
    transform-origin: center bottom;
    -webkit-transform: scalex(0.8) scaley(1.4);
    transform: scalex(0.8) scaley(1.4);
  }
  70%, 100% {
    -webkit-transform-origin: center top;
    transform-origin: center top;
    -webkit-transform: scalex(1) scaley(1);
    transform: scalex(1) scaley(1);
  }
  55% {
    -webkit-transform-origin: center top;
    transform-origin: center top;
    -webkit-transform: scalex(1.3) scaley(0.7);
    transform: scalex(1.3) scaley(0.7);
  }
}

@keyframes squidge-2 {
  20% {
    -webkit-transform-origin: center bottom;
    transform-origin: center bottom;
    -webkit-transform: scalex(1) scaley(1);
    transform: scalex(1) scaley(1);
  }
  30% {
    -webkit-transform-origin: center bottom;
    transform-origin: center bottom;
    -webkit-transform: scalex(1.3) scaley(0.7);
    transform: scalex(1.3) scaley(0.7);
  }
  40%, 35% {
    -webkit-transform-origin: center bottom;
    transform-origin: center bottom;
    -webkit-transform: scalex(0.8) scaley(1.4);
    transform: scalex(0.8) scaley(1.4);
  }
  70%, 100% {
    -webkit-transform-origin: center top;
    transform-origin: center top;
    -webkit-transform: scalex(1) scaley(1);
    transform: scalex(1) scaley(1);
  }
  55% {
    -webkit-transform-origin: center top;
    transform-origin: center top;
    -webkit-transform: scalex(1.3) scaley(0.7);
    transform: scalex(1.3) scaley(0.7);
  }
}

@-webkit-keyframes flip-3 {
  0%, 45% {
    -webkit-transform: rotate(0);
    transform: rotate(0);
  }
  65%, 100% {
    -webkit-transform: rotate(-180deg);
    transform: rotate(-180deg);
  }
}

@keyframes flip-3 {
  0%, 45% {
    -webkit-transform: rotate(0);
    transform: rotate(0);
  }
  65%, 100% {
    -webkit-transform: rotate(-180deg);
    transform: rotate(-180deg);
  }
}

@-webkit-keyframes squidge-3 {
  35% {
    -webkit-transform-origin: center bottom;
    transform-origin: center bottom;
    -webkit-transform: scalex(1) scaley(1);
    transform: scalex(1) scaley(1);
  }
  45% {
    -webkit-transform-origin: center bottom;
    transform-origin: center bottom;
    -webkit-transform: scalex(1.3) scaley(0.7);
    transform: scalex(1.3) scaley(0.7);
  }
  55%, 50% {
    -webkit-transform-origin: center bottom;
    transform-origin: center bottom;
    -webkit-transform: scalex(0.8) scaley(1.4);
    transform: scalex(0.8) scaley(1.4);
  }
  85%, 100% {
    -webkit-transform-origin: center top;
    transform-origin: center top;
    -webkit-transform: scalex(1) scaley(1);
    transform: scalex(1) scaley(1);
  }
  70% {
    -webkit-transform-origin: center top;
    transform-origin: center top;
    -webkit-transform: scalex(1.3) scaley(0.7);
    transform: scalex(1.3) scaley(0.7);
  }
}

@keyframes squidge-3 {
  35% {
    -webkit-transform-origin: center bottom;
    transform-origin: center bottom;
    -webkit-transform: scalex(1) scaley(1);
    transform: scalex(1) scaley(1);
  }
  45% {
    -webkit-transform-origin: center bottom;
    transform-origin: center bottom;
    -webkit-transform: scalex(1.3) scaley(0.7);
    transform: scalex(1.3) scaley(0.7);
  }
  55%, 50% {
    -webkit-transform-origin: center bottom;
    transform-origin: center bottom;
    -webkit-transform: scalex(0.8) scaley(1.4);
    transform: scalex(0.8) scaley(1.4);
  }
  85%, 100% {
    -webkit-transform-origin: center top;
    transform-origin: center top;
    -webkit-transform: scalex(1) scaley(1);
    transform: scalex(1) scaley(1);
  }
  70% {
    -webkit-transform-origin: center top;
    transform-origin: center top;
    -webkit-transform: scalex(1.3) scaley(0.7);
    transform: scalex(1.3) scaley(0.7);
  }
}

@-webkit-keyframes flip-4 {
  0%, 60% {
    -webkit-transform: rotate(0);
    transform: rotate(0);
  }
  80%, 100% {
    -webkit-transform: rotate(-180deg);
    transform: rotate(-180deg);
  }
}

@keyframes flip-4 {
  0%, 60% {
    -webkit-transform: rotate(0);
    transform: rotate(0);
  }
  80%, 100% {
    -webkit-transform: rotate(-180deg);
    transform: rotate(-180deg);
  }
}

@-webkit-keyframes squidge-4 {
  50% {
    -webkit-transform-origin: center bottom;
    transform-origin: center bottom;
    -webkit-transform: scalex(1) scaley(1);
    transform: scalex(1) scaley(1);
  }
  60% {
    -webkit-transform-origin: center bottom;
    transform-origin: center bottom;
    -webkit-transform: scalex(1.3) scaley(0.7);
    transform: scalex(1.3) scaley(0.7);
  }
  70%, 65% {
    -webkit-transform-origin: center bottom;
    transform-origin: center bottom;
    -webkit-transform: scalex(0.8) scaley(1.4);
    transform: scalex(0.8) scaley(1.4);
  }
  100%, 100% {
    -webkit-transform-origin: center top;
    transform-origin: center top;
    -webkit-transform: scalex(1) scaley(1);
    transform: scalex(1) scaley(1);
  }
  85% {
    -webkit-transform-origin: center top;
    transform-origin: center top;
    -webkit-transform: scalex(1.3) scaley(0.7);
    transform: scalex(1.3) scaley(0.7);
  }
}

@keyframes squidge-4 {
  50% {
    -webkit-transform-origin: center bottom;
    transform-origin: center bottom;
    -webkit-transform: scalex(1) scaley(1);
    transform: scalex(1) scaley(1);
  }
  60% {
    -webkit-transform-origin: center bottom;
    transform-origin: center bottom;
    -webkit-transform: scalex(1.3) scaley(0.7);
    transform: scalex(1.3) scaley(0.7);
  }
  70%, 65% {
    -webkit-transform-origin: center bottom;
    transform-origin: center bottom;
    -webkit-transform: scalex(0.8) scaley(1.4);
    transform: scalex(0.8) scaley(1.4);
  }
  100%, 100% {
    -webkit-transform-origin: center top;
    transform-origin: center top;
    -webkit-transform: scalex(1) scaley(1);
    transform: scalex(1) scaley(1);
  }
  85% {
    -webkit-transform-origin: center top;
    transform-origin: center top;
    -webkit-transform: scalex(1.3) scaley(0.7);
    transform: scalex(1.3) scaley(0.7);
  }
}
</style>
