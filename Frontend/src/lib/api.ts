const API_BASE = 'http://localhost:8000/api';

export interface Post {
  id: number;
  title: string;
  description: string;
  created_at: string;
  updated_at: string;
}

export async function getPosts(): Promise<Post[]> {
  const res = await fetch(`${API_BASE}/posts`, { cache: 'no-store' });
  if (!res.ok) throw new Error('Failed to fetch posts');
  return res.json();
}

export async function getPost(id: number): Promise<Post> {
  const res = await fetch(`${API_BASE}/posts/${id}`, { cache: 'no-store' });
  if (!res.ok) throw new Error('Failed to fetch post');
  return res.json();
}

export async function createPost(data: { title: string; description: string }): Promise<Post> {
  const res = await fetch(`${API_BASE}/posts`, {
    method: 'POST',
    headers: { 'Content-Type': 'application/json', Accept: 'application/json' },
    body: JSON.stringify(data),
  });
  if (!res.ok) {
    const err = await res.json();
    throw new Error(err.message || 'Failed to create post');
  }
  return res.json();
}

export async function updatePost(id: number, data: { title: string; description: string }): Promise<Post> {
  const res = await fetch(`${API_BASE}/posts/${id}`, {
    method: 'PUT',
    headers: { 'Content-Type': 'application/json', Accept: 'application/json' },
    body: JSON.stringify(data),
  });
  if (!res.ok) {
    const err = await res.json();
    throw new Error(err.message || 'Failed to update post');
  }
  return res.json();
}

export async function deletePost(id: number): Promise<void> {
  const res = await fetch(`${API_BASE}/posts/${id}`, {
    method: 'DELETE',
    headers: { Accept: 'application/json' },
  });
  if (!res.ok) throw new Error('Failed to delete post');
}
