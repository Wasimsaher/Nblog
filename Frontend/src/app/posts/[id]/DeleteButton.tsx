"use client";

import { useRouter } from "next/navigation";
import { deletePost } from "@/lib/api";
import { useState } from "react";

export default function DeleteButton({ postId }: { postId: number }) {
  const router = useRouter();
  const [loading, setLoading] = useState(false);

  async function handleDelete() {
    if (!confirm("Are you sure you want to delete this post?")) return;
    setLoading(true);
    try {
      await deletePost(postId);
      router.push("/");
      router.refresh();
    } catch {
      alert("Failed to delete post.");
      setLoading(false);
    }
  }

  return (
    <button
      onClick={handleDelete}
      disabled={loading}
      className="btn btn--danger btn--sm"
    >
      {loading ? "Deleting…" : "🗑️ Delete"}
    </button>
  );
}
