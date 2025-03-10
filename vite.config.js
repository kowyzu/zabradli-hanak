import path from "path";
import { defineConfig } from "vite";

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
};
