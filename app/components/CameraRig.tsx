import { useFrame } from "@react-three/fiber";
import { useScroll } from "@react-three/drei";
import * as THREE from "three";

export function CameraRig() {
  const scroll = useScroll();
  const targetCamPos = new THREE.Vector3();
  const targetLookAt = new THREE.Vector3();

  useFrame((state) => {
    // scroll.offset ranges from 0 to 1 smoothly
    const offset = scroll.offset;

    // Layout baseline Y position (scroll ranges from 0 to 1, vertical span is 80 units)
    const baselineY = -offset * 80;

    let xOffset = 0;
    let zDistance = 11;

    // Define interactive path transitions
    if (offset < 0.2) {
      // Hero section: center focus
      const progress = offset / 0.2;
      xOffset = THREE.MathUtils.lerp(0, -4, progress);
      zDistance = THREE.MathUtils.lerp(11, 12, progress);
    } else if (offset < 0.4) {
      // About/Services: sweep left to right
      const progress = (offset - 0.2) / 0.2;
      xOffset = THREE.MathUtils.lerp(-4, 4, progress);
      zDistance = THREE.MathUtils.lerp(12, 13.5, progress);
    } else if (offset < 0.6) {
      // Clients: loop back slightly to center-left
      const progress = (offset - 0.4) / 0.2;
      xOffset = THREE.MathUtils.lerp(4, -3, progress);
      zDistance = THREE.MathUtils.lerp(13.5, 12.5, progress);
    } else if (offset < 0.8) {
      // Stats: look up from a low camera angle
      const progress = (offset - 0.6) / 0.2;
      xOffset = THREE.MathUtils.lerp(-3, 0, progress);
      zDistance = THREE.MathUtils.lerp(12.5, 11, progress);
    } else {
      // Portfolio & Footer: transition and final outer space zoom out
      const progress = (offset - 0.8) / 0.2;
      xOffset = THREE.MathUtils.lerp(0, 0, progress);

      // In the final stages, zoom out the camera to 30 units to reveal the full floating cosmos
      if (progress > 0.65) {
        const zoomOutProgress = (progress - 0.65) / 0.35;
        zDistance = THREE.MathUtils.lerp(11, 28, zoomOutProgress);
      } else {
        zDistance = 11;
      }
    }

    // Parallax mouse follow
    const mouseX = state.pointer.x * 1.8;
    const mouseY = state.pointer.y * 1.8;

    targetCamPos.set(xOffset + mouseX, baselineY + mouseY, zDistance);
    targetLookAt.set(xOffset * 0.2, baselineY, 0);

    // Smoothly interpolate camera position
    state.camera.position.lerp(targetCamPos, 0.05);

    // Calculate current look target using current camera direction and smoothly lerping
    const currentDirection = new THREE.Vector3(0, 0, -1)
      .applyQuaternion(state.camera.quaternion)
      .add(state.camera.position);

    const lerpedLookTarget = new THREE.Vector3().lerpVectors(
      currentDirection,
      targetLookAt,
      0.08
    );

    state.camera.lookAt(lerpedLookTarget);
  });

  return null;
}
