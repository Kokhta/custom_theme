"use client";

import { useFrame } from "@react-three/fiber";
import { useScroll } from "@react-three/drei";
import * as THREE from "three";
import { useRef } from "react";

export default function CameraController() {
  const scroll = useScroll();
  const currentLookAt = useRef(new THREE.Vector3(0, 0, 0));

  useFrame((state) => {
    const offset = scroll.offset; // 0 to 1

    // Map scroll.offset (0 to 1) to sections positioned at Y = 0, -20, -40, -60, -80
    let targetY = -offset * 80;
    let targetZ = 13;
    let targetX = 0;

    // Smooth scroll camera transitions
    // If we're approaching the very end (offset > 0.9), zoom out and tilt to reveal the entire diorama floating in space
    if (offset > 0.92) {
      const endFactor = (offset - 0.92) / 0.08; // 0 to 1
      targetZ = 13 + endFactor * 45; // Zoom out significantly
      targetY = -80 - endFactor * 15; // Move camera down/out
      targetX = endFactor * 25; // Rotate/tilt camera sideways
    }

    // Smoothly interpolate camera position
    state.camera.position.x = THREE.MathUtils.lerp(state.camera.position.x, targetX, 0.08);
    state.camera.position.y = THREE.MathUtils.lerp(state.camera.position.y, targetY, 0.08);
    state.camera.position.z = THREE.MathUtils.lerp(state.camera.position.z, targetZ, 0.08);

    // Target where the camera is looking
    let targetLookAt = new THREE.Vector3(0, targetY, 0);
    if (offset > 0.92) {
      const endFactor = (offset - 0.92) / 0.08;
      // Pan target toward the floating center
      targetLookAt.set(-5, -45, 0);
    }

    // Lerp lookAt target to avoid sudden jumps
    currentLookAt.current.lerp(targetLookAt, 0.08);
    state.camera.lookAt(currentLookAt.current);
  });

  return null;
}
