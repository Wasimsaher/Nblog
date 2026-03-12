"use client";

import { useState } from "react";
import { useRouter } from "next/navigation";
import Link from "next/link";
import { createPost } from "@/lib/api";

export default function CreatePostPage() {
  const router = useRouter();
  const [title, setTitle] = useState("");
  const [description, setDescription] = useState("");
  const [error, setError] = useState("");
  const [loading, setLoading] = useState(false);

  async function handleSubmit(e: React.FormEvent) {
    e.preventDefault();
    setError("");
    setLoading(true);

    try {
      await createPost({ title, description });
      router.push("/");
      router.refresh();
    } catch (err) {
      setError(err instanceof Error ? err.message : "Failed to create post");
      setLoading(false);
    }
  }

  return (
    <main className="container">
      <Link href="/" className="back-link">
        ← Back to posts
      </Link>

      <div className="post-detail animate-in">
        <h1 className="post-detail__title">Create New Post</h1>

        {error && <div className="error-message">{error}</div>}

        <form onSubmit={handleSubmit}>
          <div className="form-group">
            <label htmlFor="title" className="form-label">Title</label>
            <input
              id="title"
              type="text"
              className="form-input"
              placeholder="Enter post title..."
              value={title}
              onChange={(e) => setTitle(e.target.value)}
              required
            />
          </div>

          <div className="form-group">
            <label htmlFor="description" className="form-label">Description</label>
            <textarea
              id="description"
              className="form-textarea"
              placeholder="Write your post content..."
              value={description}
              onChange={(e) => setDescription(e.target.value)}
              required
            />
          </div>

          <div className="form-actions">
            <button type="submit" disabled={loading} className="btn btn--accent">
              {loading ? "Creating…" : "Create Post"}
            </button>
            <Link href="/" className="btn btn--outline">
              Cancel
            </Link>
          </div>
        </form>
      </div>
    </main>
  );
}
