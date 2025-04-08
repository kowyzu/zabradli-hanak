import path from "path";
import { defineConfig } from "vite";
import vue from "@vitejs/plugin-vue";

export default {
  css: {
    devSourcemap: true, // this one
  },
  root: path.resolve(__dirname, "src"),
  resolve: {
    alias: {
      "~bootstrap": path.resolve(__dirname, "node_modules/bootstrap"),
    },
  },
  server: {
    port: 5173,
    hot: true,
  },
  plugins: [vue()],
  assetsInclude: ["**/*.jpg", "**/*.JPG", "**/*.png"],
  build: {
    outDir: "../dist",
  },
  base: "/zabradli-hanak/",
};
