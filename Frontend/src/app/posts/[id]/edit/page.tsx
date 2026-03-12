"use client";

import { useState, useEffect } from "react";
import { useRouter } from "next/navigation";
import Link from "next/link";
import { getPost, updatePost } from "@/lib/api";
import { use } from "react";

interface Props {
  params: Promise<{ id: string }>;
}

export default function EditPostPage({ params }: Props) {
  const { id } = use(params);
  const router = useRouter();

  const [title, setTitle] = useState("");
  const [description, setDescription] = useState("");
  const [error, setError] = useState("");
  const [loading, setLoading] = useState(false);
  const [fetching, setFetching] = useState(true);

  useEffect(() => {
    getPost(Number(id))
      .then((post) => {
        setTitle(post.title);
        setDescription(post.description);
        setFetching(false);
      })
      .catch(() => {
        setError("Failed to load post.");
        setFetching(false);
      });
  }, [id]);

  async function handleSubmit(e: React.FormEvent) {
    e.preventDefault();
    setError("");
    setLoading(true);

    try {
      await updatePost(Number(id), { title, description });
      router.push(`/posts/${id}`);
      router.refresh();
    } catch (err) {
      setError(err instanceof Error ? err.message : "Failed to update post");
      setLoading(false);
    }
  }

  if (fetching) {
    return (
      <main className="container">
        <div className="loading">Loading post</div>
      </main>
    );
  }

  return (
    <main className="container">
      <Link href={`/posts/${id}`} className="back-link">
        ← Back to post
      </Link>

      <div className="post-detail animate-in">
        <h1 className="post-detail__title">Edit Post</h1>

        {error && <div className="error-message">{error}</div>}

        <form onSubmit={handleSubmit}>
          <div className="form-group">
            <label htmlFor="title" className="form-label">Title</label>
            <input
              id="title"
              type="text"
              className="form-input"
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
              value={description}
              onChange={(e) => setDescription(e.target.value)}
              required
            />
          </div>

          <div className="form-actions">
            <button type="submit" disabled={loading} className="btn btn--accent">
              {loading ? "Saving…" : "Save Changes"}
            </button>
            <Link href={`/posts/${id}`} className="btn btn--outline">
              Cancel
            </Link>
          </div>
        </form>
      </div>
    </main>
  );
}
